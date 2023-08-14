import hashlib


m = hashlib.sha256()
m.update("Seguridad en el Desarrollo de Software".encode("utf-8"))

print(m.digest())
print(m.hexdigest())
