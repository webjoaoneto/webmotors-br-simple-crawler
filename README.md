Crawler WebMotors!
=====================


Olá! Muitos de nos precisamos de um banco de dados de marcas e modelos e o **Webmotors**[^webmotors] é uma ferramenta muito boa que oferece tudo de mão beijada para nos!

De tal forma, criei um simples Web-crawler que captura as marcas / modelos e variações de forma simples e rápida.

----------


Dados de veículos disponíveis em formato JSON
---------
Acesse o arquivo all.json e veja o DUMP de dados com a data: *30/jun/2014*



Como usar
---------

**Pois Bem!** primeiro você precisa ter o banco de dados mais atual das marcas, que ficam no arquivo `marcas.txt`. Esse arquivo nada mais é que um simples arquivo criado a partir do `selectbox` na home de marcas.

Logo depois, crie um banco de dados padrão e rode o SQL (Dê truncate nas tabelas para limpa-las, pois o banco já vem preenchido com os dados de Out/2013).

Daí basta rodar os php -> marcas.php -> modelos.php -> variacoes.php

> **NOTE:** Altere os arquivos, pois provavelmente a conexão com o PDO que está no arquivo é diferente da sua**

Obrigado[^joaoneto] =)

  [^webmotors]: Webmotors é um portal de anuncios de veículos, um dos maiores e melhores do Brasil.

  [^joaoneto]: João Neto é o autor dessa ferramenta.

  [1]: http://www.webmotors.com.br/
  [2]: http://www.joaoneto.blog.br "João Neto"
