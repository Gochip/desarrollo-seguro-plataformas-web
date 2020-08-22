import java.util.UUID;

public class Uuid3FromString {
	public static void main(String args[]) {
	    String nombre = "Hola Clip";
		UUID uuid = UUID.nameUUIDFromBytes(nombre.getBytes());
		int variante = uuid.variant();
		int version = uuid.version();
		System.out.println("Variante:" + variante);
		System.out.println("Versión:" + version);
		System.out.println("UUID: " + uuid.toString());
	}
}
