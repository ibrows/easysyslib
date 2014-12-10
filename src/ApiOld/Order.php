<?php
namespace Ibrows\EasySysLibrary\ApiOld;
use Ibrows\EasySysLibrary\Connection\Connection;

/**
 * @author marcsteiner
 *
 */
class Order extends AbstractType
{

    const MWST_TYPE_INCLUSIVE = 0;
    const MWST_TYPE_EXCLUSIVE = 1;
    const MWST_TYPE_FREE = 2;

    const DELIVERY_TYPE_INVOICE = 0;
    const DELIVERY_TYPE_OWN = 1;

    protected $currency_id = 2;
    protected $mwst_type = self::MWST_TYPE_INCLUSIVE;
    protected $mwst_is_net = false;
    /**
     * @var OrderPositionDiscount
     */
    protected $positionDiscountApi = null;

    /**
     * @var OrderPositionArticle
     */
    protected $positionArticleApi = null;

    /**
     * @var OrderPositionStandard
     */
    protected $positionApi = null;

    public function __construct(Connection $connection)
    {
        parent::__construct($connection);
        $this->type = 'kb_order';
    }

    /**
     * @return OrderPositionArticle
     */
    protected function getPositionDiscountApi()
    {
        if ($this->positionDiscountApi == null) {
            $this->positionDiscountApi = new OrderPositionDiscount($this->connection, $this->type, null);
        }
        return $this->positionDiscountApi;
    }

    /**
     * @return OrderPositionArticle
     */
    protected function getPositionArticleApi()
    {
        if ($this->positionArticleApi == null) {
            $this->positionArticleApi = new OrderPositionArticle($this->connection, $this->type, null);
        }
        return $this->positionArticleApi;
    }

    /**
     * @return OrderPositionStandard
     */
    protected function getPositionApi()
    {
        if ($this->positionApi == null) {
            $this->positionApi = new OrderPositionStandard($this->connection, $this->type, null);
        }
        return $this->positionApi;
    }

    public function save()
    {
        return call_user_method_array('create', $this, func_get_args());
    }

    /**
     * @param Ressource $parent_id
     * @param decimal $amount
     * @param decimal $unit_price
     * @param Ressource $tax_id
     * @param Ressource $article_id
     * @param Ressource $unit_id
     * @param decimal $discount_in_percent
     * @param string $text (max 4000)
     */
    public function createPositionArticle($parent_id, $amount, $unit_price, $tax_id, $article_id, $unit_id = null, $discount_in_percent = null, $text = null)
    {
        $this->getPositionArticleApi()->setParentId($parent_id);
        $vars = compact(array_keys(get_defined_vars()));
        unset($vars['parent_id']);
        return $this->getPositionArticleApi()->create($vars,null,false);
    }


    /**
     * @param Ressource $parent_id
     * @param decimal $amount
     * @param Ressource $tax_id
     * @param decimal $unit_price
     * @param decimal $discount_in_percent
     * @param string $text (max 4000)
     * @param Ressource $unit_id
     * @return array
     */
    public function createPositionStandard($parent_id, $amount, $tax_id, $unit_price = null, $discount_in_percent = null, $text = null, $unit_id = null)
    {
        $this->getPositionApi()->setParentId($parent_id);
        $vars = compact(array_keys(get_defined_vars()));
        unset($vars['parent_id']);
        return $this->getPositionApi()->create($vars,null,false);
    }


    /**
     * @param Ressource $parent_id
     * @param decimal $value
     * @param string $is_percentual
     * @param string $text
     * @return array
     */
    public function createPositionDiscount($parent_id, $value, $is_percentual = null, $text = null)
    {
        $this->getPositionDiscountApi()->setParentId($parent_id);
        $vars = compact(array_keys(get_defined_vars()));
        unset($vars['parent_id']);
        return $this->getPositionDiscountApi()->create($vars,null,false);
    }

    /**
     * @param Ressource Contact $contact_id
     * @param Ressource Contact $contact_sub_id
     * @param string $title
     * @return array
     */
    public function createNew($contact_id, $contact_sub_id = null, $title = null, $api_reference = null, $additionalvars = array())
    {

        $vars = compact(array_keys(get_defined_vars()));
        unset($vars['additionalvars']);
        $vars = array_merge($vars,$additionalvars);
        $vars['mwst_type'] = $this->mwst_type;
        $vars['mwst_is_net'] = $this->mwst_is_net;
        return $this->create($vars);
    }

    /**
     * @param $id
     * @return mixed|string
     */
    public function createOrderRepetition($id){
        $dateStart = new \DateTime();
        $dateEnd = new \DateTime();

        $startDate = $dateStart->modify('+1 week')->format('Y-m-d');
        $endDate = $dateEnd->modify('+1 week')->modify('+2 year')->format('Y-m-d');
        $postParams = array(
            'start' => $startDate,
            'end' => $endDate,
            'repetition' => array(
                'type' => 'weekly',
                'interval' => 1,
                'weekdays' => array('monday')
            )
        );

        return $this->connection->call("$this->type/$id/repetition", array(), $postParams, "POST");
    }

    public function getCurrency_id()
    {
        return $this->currency_id;
    }

    public function setCurrency_id($currency_id)
    {
        $this->currency_id = $currency_id;
        return $this;
    }

    public function getMwst_type()
    {
        return $this->mwst_type;
    }

    public function setMwst_type($mwst_type)
    {
        $this->mwst_type = $mwst_type;
        return $this;
    }

    public function getMwst_is_net()
    {
        return $this->mwst_is_net;
    }

    public function setMwst_is_net($mwst_is_net)
    {
        $this->mwst_is_net = $mwst_is_net;
        return $this;
    }

}
