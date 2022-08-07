# SQLi Flask

### Ejecutar server
`docker-compuse up --build`

### Probar inyecciones
Este backend brinda el endpoint /api/login/ el cual recibe el username y password del usuario que desea iniciar sesión.  
Mediante Postman o curl hacer una petición a http://localhost:5000/api/login/:  
`curl -d "username=juan&password=juan2022" -X POST http://localhost:5000/api/login/`

