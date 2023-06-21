API que conecta PHP con PostgreSQL

tiene CRUD

<tr> nueva fila
<td> siguiente casilla a la derecha
<th> nueva columna

En el contexto de la programación con PHP y el acceso a bases de datos mediante PDO, getColumnMeta() es una función que se utiliza para obtener los metadatos de una columna en un conjunto de resultados de una consulta SQL.

La función getColumnMeta() toma como parámetro el número de índice de la columna (empezando por cero) y devuelve un arreglo asociativo con los siguientes elementos:

native_type: el tipo de datos nativo de la columna en la base de datos.

pdo_type: el tipo de datos PDO de la columna.

flags: un arreglo de banderas que indican características adicionales de la columna.

name: el nombre de la columna tal como aparece en la consulta SQL original.

len: la longitud máxima de la columna en caracteres (solo para tipos de datos de caracteres).

precision: la precisión de la columna (solo para tipos de datos numéricos).

pdo_null: un arreglo que indica si la columna acepta valores nulos.