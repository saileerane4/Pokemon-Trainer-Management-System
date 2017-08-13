# Pokemon-Trainer-Management-System
The application is build using Laravel PHP Framework and it keeps the list of the the top trainers and their pokemons

## Features:
1).	A	trainer can	login/logout/register	to the	system.

2).	Admin - trainer Hierarchy is maintained to provide different access priority.

3).	Once	logged	in:

### a #
A	trainer	is	able	to	see	other	trainers’	name,	hometown,	total	numbers	of	Pokémon they	have,	names	of	Pokémon they	
have,	and	whether	or	not	they	are	an	admin.	This	is present in the “Home” page.If the	logged-in	user	is	an	admin,	
there	is	an	edit	button	for	them	so	that	they	can	do	part	c.	

#### i 
If	they	don’t	have	a	profile	yet,	the	“edit”	for	an	admin	button	is	shown.

#### ii.
If	they	don’t	have	a	profile	yet,	“N/A”	is	shown	in	those	related	cells.

### b.
A	trainer	is	able	to	create	their	profile.	

#### i.
The	link	to	“my	profile”	is	on	top	of	“log	out”	
button	
#### ii.
Once	in	the	profile	page:

1. If	a	trainer	does	not	have	a profile	yet,	the	system lets	them	know.	

2. If	a	trainer	has	already	created	a	profile,	the	system	shows	their	information	accordingly.

3. The	trainers is	able	to	edit	their	profile	information (including	name	and	email they	input	from	the	sign	up).

#### iii. 
The	trainer	should	not	be	able	to	edit	other	trainer’s	
profile.

### c. 
Admin is	able	to	edit	everyone’s	profile.

### d.
Admin is able to	see	the “admin” button by	the	Navbar which allows him to access	the	admin	page.

### e.
A	trainer	is not	able	to	access	admin	page,	an	error	is	shown	if	they	attempt	to	access	the	page.

### f.
Admin	is	able	to	add/delete	Pokémon to	the	system	database in	the	admin	page +	an	appropriate	error/success	
message	is	shown.

### g. 
If	a	Pokémon already	exists	in	the	system,	an	admin	is	not	able	to	add	it	again	(case-insensitive)	+	an	appropriate	
error/success	message	should	be	shown.

### h. 
There	is	a	search	bar	in	the	homepage	that	can	be	used to	search	for	Pokémon.	If	an	entry	exists,	a	trainer	is	be	
able	to	see	names	of	other trainers (Or just	number	of	trainers) who	have	that	Pokémon.
