class Cesar:
    ALFABETO = "abcdefghijklmnñopqrstuvwxyz "

    def __init__(self, movimiento=3):
        self.movimiento = movimiento

    def cifrar(self, mensaje):
        mensaje_cifrado = ""
        for car in mensaje:
            mensaje_cifrado += self._get_caracter_cifrado(car)

        return mensaje_cifrado

    def _get_caracter_cifrado(self, car_no_cifrado):
        i_nc = self.ALFABETO.find(car_no_cifrado)  # Índice del caracter dentro del alfabeto.

        if i_nc < 0:
            raise Exception(f"Caracter inválido: {car_no_cifrado}")

        i_cf = (i_nc + self.movimiento) % len(self.ALFABETO)  # Nuevo índice

        caracter_cifrado = self.ALFABETO[i_cf]

        return caracter_cifrado


if __name__ == "__main__":
    mensaje = "desarrollo seguro de plataformas web"
    cifrador = Cesar()
    mensaje_cifrado = cifrador.cifrar(mensaje)

    print(mensaje_cifrado)
