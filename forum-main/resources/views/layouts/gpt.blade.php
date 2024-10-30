<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fórum</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <style>
        /* styles.css */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;  
            min-height: 100vh; /* Para ocupar toda a altura da viewport */
            position: relative; /* Necessário para posicionar o rodapé corretamente */
        }

        header {
            background-color: #1a1a1a;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }

        nav {
            background-color: #333;
            padding: 10px;
            text-align: center; /* Centralizando o texto */
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: inline-block; /* Para centralizar na horizontal */
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
        }

        main {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            padding-bottom: 70px; /* Ajuste para evitar que o rodapé cubra o conteúdo */
        }

        .topic {
            background-color: #fff;
            border: 2px solid #1a1a1a;
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 1rem;
            background-color: #1a1a1a;
            color: #fff;
        }

    </style>

    <!-- Conteúdo principal -->
    <div id="main">
        <header>
            <h1>Comunidade de Discussão</h1>
        </header>
        <nav>
      
    </nav>
    
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Fóruns</a></li>
                <li><a href="#">Membros</a></li>
                <li><a href="#">Sobre</a></li>
            </ul>
        </nav>
        <main>
            <section class="topic">
                <h2>Título do Tópico</h2>
                <p>Descrição do tópico...</p>
                <a href="#">Ler mais</a>
            </section>
            <section class="topic">
                <h2>Inteligência Artificial</h2>
                <p>A inteligência artificial (IA) é a capacidade das máquinas de realizar tarefas que normalmente requerem inteligência humana. Isso inclui percepção, reconhecimento de fala, tomada de decisão, aprendizado e adaptação contínua a novas situações. A IA é amplamente aplicada em diversos campos, como saúde, finanças, transporte, entretenimento e muitos outros.</p>
                <p>Existem diferentes abordagens para desenvolver sistemas de inteligência artificial, incluindo redes neurais, algoritmos de aprendizado de máquina, lógica fuzzy e sistemas especialistas. O objetivo final é criar sistemas que possam realizar tarefas de forma autônoma e até mesmo superar a capacidade humana em certos aspectos.</p>
                <p>Apesar dos avanços significativos, a inteligência artificial também apresenta desafios e preocupações, como questões éticas, impacto no mercado de trabalho e potencial para viés algorítmico. Portanto, é essencial que o desenvolvimento e a implementação da IA sejam guiados por princípios éticos e responsáveis.</p>
            </section>
        </main>
        <footer>
            <p>&copy; 2024 Comunidade de Discussão. Todos os direitos reservados.</p>
        </footer>
    </div>
</body>
</html>
