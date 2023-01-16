from Crypto.Cipher import AES


def pad(key):
    key_m16 = key + "#" * (16 - len(key))
    return key_m16


def encrypt(message: str, key: str):
    key_m16 = pad(key)
    iv = "SDS_2022"
    aes = AES.new(key_m16.encode("utf-8"), AES.MODE_GCM, iv.encode())
    bmessage_encrypted = aes.encrypt(message.encode("utf-8"))
    return bmessage_encrypted


def main():
    message = input("Ingrese el mensaje a cifrar: ")
    key = input("Key: ")
    encrypted = encrypt(message, key)

    print("Mensaje encriptado: ", str(encrypted))
    print("Mensaje encriptado (hexadecimal): ", encrypted.hex())



if __name__ == "__main__":
    main()
