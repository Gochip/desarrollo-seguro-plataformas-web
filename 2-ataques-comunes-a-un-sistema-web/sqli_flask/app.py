import os
from hashlib import md5

import pymysql
from flask import jsonify, Flask, request
from flaskext.mysql import MySQL

app = Flask(__name__)

mysql = MySQL()

app.config['MYSQL_DATABASE_USER'] = os.getenv("MYSQL_DATABASE_USER")
app.config['MYSQL_DATABASE_PASSWORD'] = os.getenv("MYSQL_DATABASE_PASSWORD")
app.config['MYSQL_DATABASE_DB'] = os.getenv("MYSQL_DATABASE_DB")
app.config['MYSQL_DATABASE_HOST'] = os.getenv("MYSQL_DATABASE_HOST")

mysql.init_app(app)


@app.post('/api/login/')
def login():
    conn = mysql.connect()

    username = request.form["username"]
    password = request.form["password"]

    cursor = conn.cursor(pymysql.cursors.DictCursor)

    # Inseguro
    sql = "SELECT * FROM users WHERE username='" + username + "' AND password=MD5('" + password + "')"
    cursor.execute(sql)

    # Sanitizado
    #sql = "SELECT * FROM users WHERE username=%s AND password=MD5(%s)"  # Se utiliza MD5 para mantener simple el ejemplo.
    #cursor.execute(sql, [username, password])

    rows = cursor.fetchall()
    if len(rows) > 0:
        ok = True
    else:
        ok = False

    resp = jsonify({'login': ok})
    resp.status_code = 200 if ok else 404

    return resp


if __name__ == "__main__":
    app.run(debug=False, host='0.0.0.0')
