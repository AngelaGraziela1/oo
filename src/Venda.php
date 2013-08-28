<?php
/**
 * Created by JetBrains PhpStorm.
 * User: italolelis
 * Date: 8/28/13
 * Time: 3:55 PM
 * To change this template use File | Settings | File Templates.
 */

class Venda {

    private $id;
    private $data;

    /**
     * @var \Easy\Collections\Collection
     */
    private $itens;

    /**
     * @var \Easy\Collections\Collection
     */
    private $pagamentos;

    /**
     * @var Pessoa
     */
    private $cliente;

    /**
     * @var Funcionario
     */
    private $atendente;

    public function __construct($atendente, $cliente, $data)
    {
        $this->atendente = $atendente;
        $this->cliente = $cliente;
        $this->data = $data;
        $this->itens = new \Easy\Collections\Collection();
        $this->pagamentos = new \Easy\Collections\Collection();
    }

    /**
     * @param \Funcionario $atendente
     */
    public function setAtendente($atendente)
    {
        $this->atendente = $atendente;
    }

    /**
     * @return \Funcionario
     */
    public function getAtendente()
    {
        return $this->atendente;
    }

    /**
     * @param \Pessoa $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @return \Pessoa
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param array $itens
     */
    public function setItens($itens)
    {
        $this->itens = $itens;
    }

    /**
     * @return array
     */
    public function getItens()
    {
        return $this->itens;
    }

    public function addItem(ItemVenda $item) {
        $this->itens->add($item);
    }

    public function addItens(array $items) {
        $this->itens->addRange($items);
    }

    public function removerItem(ItemVenda $item) {
        $this->itens->remove($item);
    }

    public function getTotal(){
        $total = 0;
        foreach($this->itens as $item){
            $total += $item->getTotal();
        }
        return $total;
    }

    /**
     * @return \Easy\Collections\Collection
     */
    public function getPagamentos()
    {
        return $this->pagamentos;
    }

    public function finalizar(\Easy\Collections\Collection $pagamentos){

        echo sprintf('Cliente %s - %s', $this->cliente->getNome(), $this->data->format('d-m-Y H:i:s'));
        echo "<br>";
        echo "-------------------";
        echo "<br>";
        echo sprintf('Atendente: %s', $this->atendente->getNome());
        echo "<br>";
        echo '-------------------';
        echo "<br>";
        echo sprintf('Produto | valorUn | qtde | total');
        echo "<br>";

        foreach($this->itens as $item){
            echo $item->getProduto()->getDescricao() . ' ' . $item->getProduto()->getPreco() . ' ' . $item->getQtde() . ' ' . $item->getTotal() . '<br>';
        }

        echo "<br>";
        echo '-------------------';
        echo "<br>";
        echo sprintf('Total: %s', $this->getTotal());
        echo "<br>";
        echo '-------------------';
        echo "<br>";

        $this->pagamentos = $pagamentos;
        foreach($pagamentos as $item){
            echo $item->getMetodo() . ' - ' . $item->getValor();
        }


    }

}