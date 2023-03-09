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
mycursor.execute("Create Table Podcasts ( ID INT auto_increment PRIMARY KEY, Guest varchar(255), Title varchar(255), Releasedate datetime, Duration_ms int, Notes varchar(255))")
#mycursor.execute("SELECT * FROM PODCASTS")


# Set up logger
log.basicConfig(filename='spotify.log', filemode='w')

scope = ["user-library-read", "user-modify-playback-state", "user-read-playback-state", "user-read-currently-playing", "user-library-modify"]

# auth_manager = SpotifyClientCredentials()
sp = spotipy.Spotify(auth_manager=SpotifyOAuth(scope=scope))

errorMessage = "Error: please try again or check network if error persists"
print("Before")
episode = sp.show_episodes("https://open.spotify.com/show/2MAi0BvDc6GTFvKFPXnkCL?si=2d6d4bfc3465451b", limit=1, offset=0, market=None)
print("After")
items = episode["items"]

pattern = re.compile(r"\B#([A-Za-z0-9]{2,})(?![~!@#$%^&*()=+_`\-\|\/'\[\]\{\}]|[?.,]*\w)", re.IGNORECASE)
sql = "INSERT INTO Podcasts (Guest, Title, Releasedate, Duration_ms, Notes) VALUES (%s, %s, %s, %s, %s)"

n = episode['total']
idx = 1
# logic bad, outcome good
while (n > 0): 
    print("Hello")
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

            # print("Episode Number: " , epNum)
        if ("Lex Solo" not in split[0]):
            # print("Guest: "+ split[0])

            if (len(split) > 1):
                values = (split[0], split[1], items[0]['release_date'], items[0]['duration_ms'], '')
                mycursor.execute(sql, values)
                mydb.commit()
            elif (idx == 100 or idx == 84):
                values = (split[0], "", items[0]['release_date'], items[0]['duration_ms'], '')
                mycursor.execute(sql, values)
                mydb.commit()
                values = (split[0], "", items[0]['release_date'], items[0]['duration_ms'], '')
                mycursor.execute(sql, values)
                mydb.commit()
            else:
                values = (split[0], "", items[0]['release_date'], items[0]['duration_ms'], '')
                mycursor.execute(sql, values)
                mydb.commit()
                # print("Episode Title: "+split[1])
            # print("Duration: ", items[0]['duration_ms'])
            # print("Release Date: "+ items[0]['release_date'])
            # print()

    idx+=1
    n-=1

