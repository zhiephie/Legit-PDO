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
query("DELETE FROM table WHERE column=value;");
delete('table', 'field', 4);
```
