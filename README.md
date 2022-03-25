Clone o projeto
git clone https://github.com/luancunha/neo-qualit.git

Intale as dependências e o framework
composer install --no-scripts

Copie o arquivo .env.example
Se estiver utilizando linux: cp .env.example .env
Se estiver no windows abra o arquivo em um editor de código e o salve novamente como .env

Crie uma nova chave para a aplicação
php artisan key:generate

Rode as migrations
php artisan migrate --seed

php artisan serve

echo "# neo-quality" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/luancunha/neo-quality.git
git push -u origin main
