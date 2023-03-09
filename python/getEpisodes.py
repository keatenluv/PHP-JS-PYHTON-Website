import spotipy
from spotipy.oauth2 import SpotifyOAuth
import spotipy.util as util
import logging as log
import mysql.connector

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
n = episode['total']

for i in range(n):
    items = episode["items"]
    print(i, " ",items[0]['name'])
    episode = sp.show_episodes("https://open.spotify.com/show/2MAi0BvDc6GTFvKFPXnkCL?si=2d6d4bfc3465451b", limit=1, offset=i+1, market=None)
