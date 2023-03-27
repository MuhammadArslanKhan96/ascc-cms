<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for Order.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Order
 */
trait OrderTrait
{
    /**
     * The current status of the order.
     *
     * @var OrderStatus
     */
    public $orderStatus;

    /**
     * Indicates whether the offer was accepted as a gift for someone other than
     * the buyer.
     *
     * @var bool|Boolean
     */
    public $isGift;

    /**
     * A number that confirms the given order or payment has been received.
     *
     * @var string|Text
     */
    public $confirmationNumber;

    /**
     * An entity that arranges for an exchange between a buyer and a seller.  In
     * most cases a broker never acquires or releases ownership of a product or
     * service involved in an exchange.  If it is not clear whether an entity is a
     * broker, seller, or buyer, the latter two terms are preferred.
     *
     * @var Person|Organization
     */
    public $broker;

    /**
     * The date that payment is due.
     *
     * @var Date|DateTime
     */
    public $paymentDueDate;

    /**
     * An entity which offers (sells / leases / lends / loans) the services /
     * goods.  A seller may also be a provider.
     *
     * @var Organization|Person
     */
    public $seller;

    /**
     * Any discount applied (to an Order).
     *
     * @var float|string|Number|Text
     */
    public $discount;

    /**
     * The currency of the discount.  Use standard formats: [ISO 4217 currency
     * format](http://en.wikipedia.org/wiki/ISO_4217), e.g. "USD"; [Ticker
     * symbol](https://en.wikipedia.org/wiki/List_of_cryptocurrencies) for
     * cryptocurrencies, e.g. "BTC"; well known names for [Local Exchange Trading
     * Systems](https://en.wikipedia.org/wiki/Local_exchange_trading_system)
     * (LETS) and other currency types, e.g. "Ithaca HOUR".
     *
     * @var string|Text
     */
    public $discountCurrency;

    /**
     * Party placing the order or paying the invoice.
     *
     * @var Organization|Person
     */
    public $customer;

    /**
     * The date that payment is due.
     *
     * @var DateTime
     */
    public $paymentDue;

    /**
     * The offer(s) -- e.g., product, quantity and price combinations -- included
     * in the order.
     *
     * @var Offer
     */
    public $acceptedOffer;

    /**
     * An identifier for the method of payment used (e.g. the last 4 digits of the
     * credit card).
     *
     * @var string|Text
     */
    public $paymentMethodId;

    /**
     * 'merchant' is an out-dated term for 'seller'.
     *
     * @var Organization|Person
     */
    public $merchant;

    /**
     * The order is being paid as part of the referenced Invoice.
     *
     * @var Invoice
     */
    public $partOfInvoice;

    /**
     * The identifier of the transaction.
     *
     * @var string|Text
     */
    public $orderNumber;

    /**
     * The name of the credit card or other method of payment for the order.
     *
     * @var PaymentMethod
     */
    public $paymentMethod;

    /**
     * Code used to redeem a discount.
     *
     * @var string|Text
     */
    public $discountCode;

    /**
     * The delivery of the parcel related to this order or order item.
     *
     * @var ParcelDelivery
     */
    public $orderDelivery;

    /**
     * The item ordered.
     *
     * @var Product|Service|OrderItem
     */
    public $orderedItem;

    /**
     * The billing address for the order.
     *
     * @var PostalAddress
     */
    public $billingAddress;

    /**
     * The URL for sending a payment.
     *
     * @var URL
     */
    public $paymentUrl;

    /**
     * Date order was placed.
     *
     * @var DateTime|Date
     */
    public $orderDate;
}
