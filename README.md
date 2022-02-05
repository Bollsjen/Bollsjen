For at køre skal du ind i virtualhost for din apache server og sætte den op til at smide dig in i public mappen

Hvis du bruger XAMPP kan du gå ind i httpd-vhosts.conf og tilføje noget lign. nedenstående:

<VirtualHost *:80>
    	DocumentRoot "C:\xampp\htdocs\bollsjen\public"
    	ServerName bollsjen.local
	<Directory "C:\xampp\htdocs\bollsjen">
		DirectoryIndex index.php index.html
		AllowOverride All
		Order allow,deny
		Allow from all
	</Directory>
</VirtualHost>

for at dette vil virke skal du ind i "C:\Windows\System32\drivers\etc" og tilføje "127.0.0.1 bollsjen.local" til bunden af hosts filen

Genstart apache serveren og du er good to go

Nogle functioner kan være ude af function da dette stadig er under udvikling