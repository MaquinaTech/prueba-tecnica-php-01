# Prueba técnica de implementación y refactorización de marcador de Padel

Trabajas en la StartUp BenitoAndCompany; todas las semanas el equipo de desarrollo os reunís para jugar un pequeño torneo de Padel entre vosotros, en el Club de Pádel que la empresa os proporciona de forma gratuita, "RaquetasYPelotasClub". A uno de tus compañeros, le han encargado un pequeño trabajo de desarrollo para el Club de Padel. Tras la recogida de requisitos, se le presupuestan un total de 10 horas de desarrollo al Club de Pádel. Tu compañero comienza el desarrollo, y cuando ya lleva 7,5 horas invertidas en él, el dichoso COVID le ataca y no le queda otro remedio que coger la baja y quedarse en casa enfermo; además, no puede hacer nada, ya que le ha dado bastante fuerte, y tiene bastantes dolores de cabeza.

No obstante, él le dice a tu jefe que ha completado el trabajo (¡en menos tiempo que el presupuestado!), y que su desarrollo pasa todos los tests; por tanto, tu jefe te pide que, si puedes, cojas ese desarrollo, y lo termines.

Pero tu jefe también te dice que solo puedes invertir un par de horas, más o menos, para que él pueda facturale al Club de Padel las 10 horas presupuestadas (y no perder dinero); así que te pide que lo único que hagas es reordenar un poco el código, y que tomes notas para darle feedback a tu compañero de lo bien que lo ha hecho (¡lo ha hecho en 7,5 horas!).

En cuanto abres el código, y ves lo que ha hecho tu compañero, entiendes que vas a tener que realizar unas cuantas refactorizaciones en el mismo; y también que debes de prepararte para explicarle a tu jefe sobre cuando cuesta el trabajo de refactorización, las horas extras que vas a tener que facturar, y el valor de los principios SOLID y Clean Code, así de hacer tests de la forma adecuada.

Para esta prueba técnica, hay diferentes versiones, cada una de ellas con sus propios retos y fallos de diseño (code smells); la mejor forma de empezar, es por el primer archivo / clase (el denominado como "PadelGame1"); el set de pruebas con las que se provee el código (¡esto parece que sí lo hizo bien tu compañero!), es bastante amplio y exhaustivo, así como bastante comprensible; y su ejecución es muy rápida.

No se deberían de tener que cambiar los tests, únicamente ejecutarlos con la refactorización / implementación que se realice.

Se debe comentar que hay un error de implementación que es intencionado, en todos los casos; los nombres de los jugadores se han "hardcodeado" a "player1" y "player2"; una vez detectados los code smells y errores de diseño, el siguiente paso debe de ser hacer la implementación (así como los tests) para que los jugadores puedan tener nombres diferentes y puedan ser definidos desde los clientes del Marcador de Juego, sin tener los nombres de los jugadores hardcodeados.

## Descripción de la prueba técnica

### Marcador para juego de Padel

Las reglas del Padel son sencillas, pero, aún así, el padel tiene un sistema de puntuación un tanto peculiar, y que para los novatos puede ser un poco complicado de entender o seguir. El Club de Padel "RaquetasYPelotasClub" te ha contratado para que programes un marcador para mostrar la puntuación actual durante los juegos de Padel.

Puedes leer más sobre como funciona la puntuación en Padel en la Wikipedia; pero la resumimos a continuación:

- Juegos:
  - Un juego lo gana el primer jugador que ha ganado al menos cuatro puntos en total y con una ventaja sobre el oponente de al menos dos puntos.
  - La descripción de la puntuación del padel, no se realiza de forma lineal, sino que se describe de una forma especial; como sigue: las puntuaciones de cero a tres puntos se describen como "Love" (nada), "Fifteen" (Quince), "Thirty" (Treinta) y "Forty" (Cuarenta) respectivamente.
  - Si cada jugador ha anotado al menos tres puntos y sus puntuaciones son iguales, el marcador señalará "Deuce" (iguales).
  - Si cada jugador ha anotado al menos tres puntos y un jugador tiene un punto más que su oponente, el marcador del juego señalará "Advantaje" (Ventaja) para el jugador que va en cabeza.
- Sets y partidos:
  - "RaquetasYPelotasClub" solo te ha contratado para crear un marcador de los juegos; los sets y los partidos están fuera del alcance del desarrollo actual; si este desarrollo es de su agrado, entonces te contratarán el desarrollo de un sistema de puntuación completo.
