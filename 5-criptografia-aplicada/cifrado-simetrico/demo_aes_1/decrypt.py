from Crypto.Cipher import AES


def pad(key):
    key_m16 = key + "#" * (16 - len(key))
    return key_m16


def decrypt(message_encrypted, key: str):
    key_m16 = pad(key)
    iv = "SDS_2022"
    aes = AES.new(key_m16.encode("utf-8"), AES.MODE_GCM, iv.encode())
    decrypted = aes.decrypt(message_encrypted)
    return decrypted


def main():
    message_encrypted_hex = input("Mensaje cifrado (hex): ")
    key = input("Key: ")
    message_encrypted = bytes.fromhex(message_encrypted_hex)
    message_decrypted = decrypt(message_encrypted, key)
    print("Mensaje: ", message_decrypted.decode("utf-8"))


if __name__ == "__main__":
    main()
