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

#Get Score for Team A
sql = "SELECT * FROM games WHERE gameId='%s' AND team='%s'" % (currentGameId, 'A')
cur.execute(sql)
teamGoalsA = cur.rowcount

#Get Score for Team B
sql = "SELECT * FROM games WHERE gameId='%s' AND team='%s'" % (currentGameId, 'B')
cur.execute(sql)
teamGoalsB = cur.rowcount

print("Team A ", teamGoalsA)

#print all whole dataset to check if output is correct
cur.execute("SELECT * FROM games")
print("Following entries are present")
for i in range(cur.rowcount):
    row = cur.fetchone()
    print (int(row[0]), int(row[1]), row[2])

print("Team A ", int(teamGoalsA), ": Team B ", int(teamGoalsB))


con.close()
