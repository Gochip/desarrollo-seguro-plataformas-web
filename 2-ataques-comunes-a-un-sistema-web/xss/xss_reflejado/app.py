from flask import Flask, render_template, request

app = Flask(__name__)

USUARIOS = [
    {
        "id": 1,
        "username": "juanlopez",
        "email": "jlopez@gmail.com"
    },
    {
        "id": 2,
        "username": "pablogomez",
        "email": "pgomez@gmail.com"
    },
    {
        "id": 3,
        "username": "mariafernandez",
        "email": "mfernandez@gmail.com"
    },
    {
        "id": 4,
        "username": "marcosgomez",
        "email": "mgomez@gmail.com"
    },
]


@app.route("/")
def index():
    search = request.args.get("search", None)
    users = []
    if search:
        for user in USUARIOS:
            if search in user["username"] or search in user["email"]:
                users.append(user)
    else:
        users = USUARIOS
    # render_template solo escapa los archivos con extensiones: .html, .htm, .xml, y .xhtml.
    return render_template("index.vhtml", search=search, users=users)  # ¡Observar la extensión del archivo!
