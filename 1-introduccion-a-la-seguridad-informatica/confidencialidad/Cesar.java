public class Cesar {

	public static String alfabeto = "abcdefghijklmnopqrstuvwxyz ";
	public static int movimiento = 3;
	public static void main(String args[]) {
		String mensajeEnClaro = "desarrollo seguro de plataformas web";

		String mensajeCifrado = "";
		for (int i = 0; i < mensajeEnClaro.length(); i++) {
			char c = mensajeEnClaro.charAt(i);
			char caracterCifrado = getCaracterCifrado(c);
			if (caracterCifrado == '\u0000') {
				System.out.println("Error: Se ingresó un caracter que no se pudo cifrar.");
				return;
			} else {
				mensajeCifrado += caracterCifrado;
			}
		}
		System.out.println(mensajeCifrado);
	}

	public static char getCaracterCifrado(int caracterSinCifrar) {
		for (int i = 0; i < alfabeto.length(); i++) {
			char c = alfabeto.charAt(i);
			if (caracterSinCifrar == alfabeto.charAt(i)) {
				return alfabeto.charAt((i + movimiento) % alfabeto.length());
			}
		}
		return '\u0000';
	}
}
