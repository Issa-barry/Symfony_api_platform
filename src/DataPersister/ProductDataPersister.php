<?php
namespace App\DataPersister;
use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;

class ProductDataPersister implements DataPersisterInterface
{
  protected  $em;

  public function __construct(EntityManagerInterface $em)
  {
     $this->em = $em;
  }

  public function supports($data): bool
  {
    //Si data est un produit
     return $data instanceof Product;
  }

  public function persist($data)
  {
      $data->setCreatedAt(new \DateTimeImmutable());
      $data->setUpdatedAt(new \DateTimeImmutable());

      $this->em->persist($data);
      $this->em->flush();
  }

  public function remove($data)
  {
    $this->em->remove($data);
    $this->em->flush(); 
  }
}
