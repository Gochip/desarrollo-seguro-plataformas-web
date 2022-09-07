conn = new Mongo();

db = conn.getDB("test");

db.usuarios.insert({"nombre_usuario": "juan", "clave": "jdfjsnfjsndklcklwemomdmklfmklfgmdmwef"});

