#support for python 2 only
import MySQLdb as mdb
import sys
import random

#host ip 172.18.. ist die aktuelle docker ip. intern auf localhost. 
host = '172.18.0.2'
user = 'root'
password = 'kicker'
port = 3306
db = 'kicker'

con = mdb.connect(
    host=host,
    user=user,
    passwd=password,
    port=port,
    db=db
    )


cur = con.cursor()
print("Checking for last game id")
#Retriev current gameId
cur.execute("SELECT * FROM games ORDER BY id DESC LIMIT 0,1")

row = cur.fetchone()

currentGameId = int(row[1])
print ("Current GameId:", currentGameId)

#New game means gameid + 1

newGameId = currentGameId + 1


print("New GameId: ", newGameId)
sql = "INSERT INTO games(gameId, team) VALUES(%d, '%s')" % (newGameId, 'new')

cur.execute(sql)

con.commit()

#print all whole dataset to check if new entry is written correct
cur.execute("SELECT * FROM games")
print("Following entries are present")
for i in range(cur.rowcount):
    row = cur.fetchone()
    print (int(row[0]), int(row[1]), row[2])

con.close()
