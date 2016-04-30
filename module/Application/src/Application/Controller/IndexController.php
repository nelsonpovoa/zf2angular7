<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Categoria;
use Application\Entity\Produto;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        // getServiceLocator() faz parte do Zend e esta invocando service manager.
        // O get está invocar um servico
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        // getRepository vem do doctrine
        $repo = $em->getRepository("Application\Entity\Categoria");

      // 1
      //  $categoria = new Categoria();
      //  $categoria->setNome('laptops');
      //  $em->persist($categoria);
      //  $em->flush();

        //$categoriaService = $this->getServiceLocator()->get('Application\Service\Categoria');
        //$categoriaService->insert('Monitores');


        $categorias = $repo->findAll();

        $produtoService = $this->getServiceLocator()->get('Application\Service\Produto');
        //$produtoService->insert(array('nome' => 'Game B', 'categoriaId' =>1));
        $produtoService->delete(2);
        // $produto->setNome("Game A");
        // $produto->setDescricao("O game A e fixe!");
        // $produto->setCategoria($categoria);
        //$em->persist($produto);
        //$em->flush();

        return new ViewModel(array('categorias' => $categorias));
    }
}
