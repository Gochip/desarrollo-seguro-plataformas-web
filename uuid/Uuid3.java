import java.util.UUID;

public class Uuid3 {
	public static void main(String args[]) {
	    byte[] b = {1, 10, 100};
		UUID uuid = UUID.nameUUIDFromBytes(b);
		int variante = uuid.variant();
		int version = uuid.version();
		System.out.println("Variante:" + variante);
		System.out.println("Versión:" + version);
		System.out.println("UUID: " + uuid.toString());
	}
}
