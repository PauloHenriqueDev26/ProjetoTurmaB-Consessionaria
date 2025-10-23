<?php
namespace Concessionaria\Projetob\Controller;

class Principal
{
    private \Twig\Environment $ambiente;
    private \Twig\Loader\FilesystemLoader $carregador;

    public function __construct()
    {
        $this->carregador = new \Twig\Loader\FilesystemLoader("./src/View");
        $this->ambiente = new \Twig\Environment($this->carregador);
    }

    public function inicio()
    {
        echo $this->ambiente->render("veiculos/inicio.html");
    }

    public function detalhes($data)
    {
        $id = $data["id"];

        // Simula os dados dos veículos
        $veiculos = [
            1 => [
                "nome" => "Toyota Corolla",
                "preco" => "R$ 145.000,00",
                "descricao" => "O Toyota Corolla é conhecido por sua confiabilidade e conforto.",
                "imagem" => "corolla.jpg"
            ],
            2 => [
                "nome" => "Honda Civic",
                "preco" => "R$ 165.000,00",
                "descricao" => "O Honda Civic oferece desempenho e eficiência com design moderno.",
                "imagem" => "civic.jpg"
            ],
            3 => [
                "nome" => "Porsche 911 turbo S",
                "preco" => "R$ 2.500.000,00",
                "descricao" => "Superesportivo com desempenho excepcional e tecnologia avançada.",
                "imagem" => "porsche911.jpg"
            ]
        ];

        // Verifica se o ID existe
        if (!isset($veiculos[$id])) {
            echo "Veículo não encontrado!";
            return;
        }

        // Renderiza a página de detalhes
        echo $this->ambiente->render("veiculos/detalhes.html", [
            "veiculo" => $veiculos[$id]
        ]);
    }
}
