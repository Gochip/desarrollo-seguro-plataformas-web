import java.util.UUID;

public class Uuid4 {
	public static void main(String args[]) {
		UUID uuid = UUID.randomUUID();
		int variante = uuid.variant();
		int version = uuid.version();
		System.out.println("Variante:" + variante);
		System.out.println("Versión:" + version);
		System.out.println("UUID: " + uuid.toString());
	}
}
