<?php

namespace App\Cart;

use App\Entity\Purchase;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService
{
    /**
     * @var SessionInterface
     */
    protected $session;

    /**
     * @var ProductRepository
     */
    protected $productRepository;


    public function __construct(SessionInterface $session, ProductRepository $productRepository)
    {
        $this->session = $session;
        $this->productRepository = $productRepository;
    }

    protected function getCart(): array
    {
        return $this->session->get('cart', []);
    }

    protected function saveCart(array $cart)
    {
        $this->session->set('cart', $cart);
    }

    public function add(int $id)
    {
        $cart = $this->getCart();

        if (!array_key_exists($id, $cart)) {
            $cart[$id] = 0;
        }
        $cart[$id]++;


        $this->saveCart($cart);
    }


    public function getTotal(): int
    {
        $total = 0;
        foreach ($this->getCart() as $id => $qty) {
            $product = $this->productRepository->find($id);

            if (!$product) {
                continue;
            }
            $total += $product->getPrice() * $qty;

        }

        return $total;
    }

    /**
     * @return CartItem[]
     */
    public function getDetailedCartItems(): array
    {
        $detailedCart = [];

        foreach ($this->getCart() as $id => $qty) {
            $product = $this->productRepository->find($id);

            if (!$product) {
                continue;
            }
            $detailedCart[] = new CartItem($product, $qty);

        }

        return $detailedCart;
    }

    public function remove(int $id)
    {
        $cart = $this->getCart();
        unset($cart[$id]);

        $this->saveCart($cart);
    }

    public function decrement($id)
    {
        $cart = $this->getCart();
        if (!array_key_exists($id, $cart)) {
            return;
        }
        if ($cart[$id] === 1) {
            $this->remove($id);
            return;
        }

        $cart[$id]--;
        $this->saveCart($cart);
    }
    public function empty(){
        $this->saveCart([]);
    }

}