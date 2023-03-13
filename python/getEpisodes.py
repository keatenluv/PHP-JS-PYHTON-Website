import spotipy
from spotipy.oauth2 import SpotifyOAuth
import spotipy.util as util
import logging as log
import mysql.connector
import re



mydb = mysql.connector.connect(
    user="root",
    password="Kjll1800^",
    host="127.0.0.1",
    port="3300",
    database="phpTest"
)

# Creates tables to save api data
mycursor = mydb.cursor()
mycursor.execute("Drop Table if Exists podcasts")
mycursor.execute("Create Table Podcasts ( ID INT auto_increment PRIMARY KEY, Guest varchar(255), Title varchar(255), Releasedate date, DurationMins int)")

# Used in calls to database to... insert
sql = "INSERT INTO Podcasts (Guest, Title, Releasedate, DurationMins) VALUES (%s, %s, %s, %s)"

# Connect to spotify
scope = ["user-library-read", "user-modify-playback-state", "user-read-playback-state", "user-read-currently-playing", "user-library-modify"]
sp = spotipy.Spotify(auth_manager=SpotifyOAuth(scope=scope))

errorMessage = "Error: please try again or check network if error persists"

# get most recent episode to check total num of episodeds
episode = sp.show_episodes("https://open.spotify.com/show/2MAi0BvDc6GTFvKFPXnkCL?si=2d6d4bfc3465451b", limit=1, offset=0, market=None)
items = episode["items"]

# Regex for removing ep num
pattern = re.compile(r"\B#([A-Za-z0-9]{2,})(?![~!@#$%^&*()=+_`\-\|\/'\[\]\{\}]|[?.,]*\w)", re.IGNORECASE)
n = episode['total']
idx = 1

# Save episodes to database
while (n > 0): 
    episode = sp.show_episodes("https://open.spotify.com/show/2MAi0BvDc6GTFvKFPXnkCL?si=2d6d4bfc3465451b", limit=1, offset=n-1, market=None)

    items = episode["items"]
    title = items[0]['name']
    split = title.split(": ")
    epNum = pattern.match(items[0]['name'])
    if ("Lex" in split[0] or "New Name" in split[0]):
        print("Exclusion")
    else:
        durationMin = ((items[0]['duration_ms']/1000)/60)

        # Removes episode number from guest
        if (epNum is not None):
            remove = epNum.group() + " – "
            removeNum = re.sub(remove, "", title)
            split = removeNum.split(": ")
            epNum = epNum.group().replace('#','')


        # Some episodes were removed from spotify, specifically episode 100 and 84
        if (idx == 100 or idx == 84):
            values = [('', '', '2010/11/11', 0),(split[0], "", items[0]['release_date'], durationMin)]
            mycursor.executemany(sql, values)
            mydb.commit()
        # Some episodes don't have a title
        elif (len(split) > 1):
            values = (split[0], split[1], items[0]['release_date'], durationMin)
            mycursor.execute(sql, values)
            mydb.commit()
        # All
        else:
            values = (split[0], "", items[0]['release_date'], durationMin)
            mycursor.execute(sql, values)
            mydb.commit()

    # Hire me Lex
    idx+=1
    n-=1