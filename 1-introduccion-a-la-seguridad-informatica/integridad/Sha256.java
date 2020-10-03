import java.security.*;
import java.nio.charset.*;

public class Sha256 {
   public static void main(String args[]) {
      try {
         MessageDigest generadorHash = MessageDigest.getInstance("SHA-256");

         String texto = "CORDOBA CAPITAL";
         byte[] hash = generadorHash.digest(texto.getBytes(StandardCharsets.UTF_8));

         for (byte i = 0; i < hash.length; i++) {
            byte h = hash[i];
            System.out.println(h);
         }
      } catch (NoSuchAlgorithmException ex) {

      }
   }
}

