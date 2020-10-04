import java.security.*;
import java.nio.charset.*;
import java.math.*;

public class Sha256 {
   public static void main(String args[]) {
      try {
         MessageDigest generadorHash = MessageDigest.getInstance("SHA-256");

         String texto = "CORDOBA CAPITAL";

         // Se obtiene el hash en bytes.
         byte[] hashBytes = generadorHash.digest(texto.getBytes(StandardCharsets.UTF_8));

         // Se imprime el resultado en bytes.
         System.out.println("Resultado en bytes:");
         for (byte i = 0; i < hashBytes.length; i++) {
            byte h = hashBytes[i];
            System.out.println(h);
         }

         // Se convierte el hash en formato hexadecimal.
         System.out.println("Resultado en hexadecimal:");
         BigInteger hashNumero = new BigInteger(1, hashBytes);
         String hashString = hashNumero.toString(16);
         System.out.println(hashString);
      } catch (NoSuchAlgorithmException ex) {

      }
   }
}

