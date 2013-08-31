<?php

abstract class Pessoa
{

    /**
     * @var bigint
     */
    private $id;
    /**
     * @var string
     */
    private $nome;
    /**
     * @var DateTime
     */
    private $nascimento;

    /**
     * @param \bigint $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return \bigint
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \DateTime $nascimento
     */
    public function setNascimento($nascimento)
    {
        $this->nascimento = $nascimento;
    }

    /**
     * @return \DateTime
     */
    public function getNascimento()
    {
        return $this->nascimento;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

} 