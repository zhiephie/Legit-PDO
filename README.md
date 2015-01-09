# Legit PDO

## Simple PDO class

## Select
```
$q = query("SELECT * FROM table");

foreach($q->fetchAll() as $row) {
	var_dump($row);
}
// Produces: SELECT * FROM table
```

## Insert
```
//insert data
$data = array (
	'id' 		 => 1,
	'Name'		 => 'Yudi Purwanto'
);
insert('table', $data);

or

query("INSERT INTO table () VALUES()");
```

##Update
```
//update data
query("UPDATE table SET Name="Elsa" WHERE id=4");
//or
//update('mytable', $data, $value);
```

## Delete
```
query("UPDATE table SET Name='Elisa' WHERE id=1");
delete('table', 'field', 4);
```
