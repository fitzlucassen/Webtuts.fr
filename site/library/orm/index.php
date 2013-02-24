<?php	

	/* App */
	require(__library_dir__.'orm/kernel/app.class.php');

	/* Collection */
	require(__library_dir__.'orm/resources/collection.class.php');

	/* ORMSTDAbstract Class */
	require(__library_dir__.'orm/resources/ormstdtableabstract.class.php');

	/* STD Class */
	require(__library_dir__.'orm/resources/stdtable.class.php');

	/* ORMSTDAbstract Class */
	require(__library_dir__.'orm/resources/ormstdabstract.class.php');

	/* STD Class */
	require(__library_dir__.'orm/resources/std.class.php');

	/* Connexion a la bd */
	require(__library_dir__.'orm/resources/sql.class.php');
	require(__library_dir__.'orm/resources/sql2.class.php');
	require(__library_dir__.'orm/resources/sql3.class.php');

	/* Type interface */
	require(__library_dir__.'orm/resources/type.interface.php');

	/* Types */
	require(__library_dir__.'orm/types/lang.class.php');
	require(__library_dir__.'orm/types/boolean.class.php');
	require(__library_dir__.'orm/types/integer.class.php');
	require(__library_dir__.'orm/types/text.class.php');
	require(__library_dir__.'orm/types/datetime.class.php');

?>