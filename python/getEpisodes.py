import spotipy
from spotipy.oauth2 import SpotifyOAuth
import spotipy.util as util
import logging as log
import mysql.connector
import re

''' 
export SPOTIPY_CLIENT_ID='0584317813274cdabe015c9e0984e0c3'
export SPOTIPY_CLIENT_SECRET='71d612b8f92e4efda668a09eb7b863f8'
export SPOTIPY_REDIRECT_URI='https://localhost:8083/callback'
'''

mydb = mysql.connector.connect(
    user="root",
    password="Kjll1800^",
    host="127.0.0.1",
    port="3300",
    database="phpTest"
)

mycursor = mydb.cursor()
mycursor.execute("Drop Table if Exists podcasts")
mycursor.execute("CREATE TABLE podcasts (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255), address VARCHAR(255))")
mycursor.execute("SHOW TABLES")

for x in mycursor:
  print(x)

# Set up logger
log.basicConfig(filename='spotify.log', filemode='w')

scope = ["user-library-read", "user-modify-playback-state", "user-read-playback-state", "user-read-currently-playing", "user-library-modify"]

# auth_manager = SpotifyClientCredentials()
sp = spotipy.Spotify(auth_manager=SpotifyOAuth(scope=scope))

errorMessage = "Error: please try again or check network if error persists"

episode = sp.show_episodes("https://open.spotify.com/show/2MAi0BvDc6GTFvKFPXnkCL?si=2d6d4bfc3465451b", limit=1, offset=0, market=None)
items = episode["items"]

pattern = re.compile(r"\B#([A-Za-z0-9]{2,})(?![~!@#$%^&*()=+_`\-\|\/'\[\]\{\}]|[?.,]*\w)", re.IGNORECASE)

n = episode['total']
idx = 1
# logic bad, outcome good
while (n > 0): 

    episode = sp.show_episodes("https://open.spotify.com/show/2MAi0BvDc6GTFvKFPXnkCL?si=2d6d4bfc3465451b", limit=1, offset=n-1, market=None)

    if (idx != 121):
        items = episode["items"]
        if (idx < 72):
            epNum = idx
            print("Episode Number: " , idx)

        title = items[0]['name']
        split = title.split(": ")
        epNum = pattern.match(items[0]['name'])
        if (epNum is not None and "Lex Solo" not in split[0]):
            remove = epNum.group() + " – "
            removeNum = re.sub(remove, "", title)
            split = removeNum.split(": ")
            epNum = epNum.group().replace('#','')

            print("Episode Number: " , epNum)
        if ("Lex Solo" not in split[0]):
            print("Guest: "+ split[0])
            if (len(split) > 1):
                print("Episode Title: "+split[1])
            print("Duration: ", items[0]['duration_ms'])
            print("Release Date: "+ items[0]['release_date'])
            print()

    idx+=1
    n-=1

