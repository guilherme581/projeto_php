<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<link rel="stylesheet" href="style.css">
<style>
.btn-sair {
    display: block;       
    margin-left: 15px;            /* espaço ao lado do texto */
    margin-top: -20px;             /* <-- SOBE o botão */
    padding: 10px 22px;
    background-color: #000000;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 700;
    border: 3px solid #000000;
    box-shadow: 0 4px 8px rgba(0,0,0,0.12);
    transition: transform .15s ease, background-color .15s ease;
}

.btn-sair:hover {
    background-color: #000000;
    transform: translateY(-2px);
}
</style>




<h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario'], ENT_QUOTES); ?>!</h2>

<a href="logout.php" class="btn-sair">Sair</a>

