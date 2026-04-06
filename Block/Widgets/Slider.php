<?php
namespace Swissup\TestimonialsCustom\Block\Widgets;

use Swissup\Testimonials\Model\Data as TestimonialsModel;
use Swissup\Testimonials\Model\Resolver\DataProvider\Testimonials as DataProvider;

class Slider extends \Swissup\Testimonials\Block\Widgets\Slider
{
    private $dataProvider;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        DataProvider $dataProvider,
        \Swissup\Testimonials\Helper\ListHelper $listHelper,
        array $data = []
    ) {
        parent::__construct($context, $dataProvider, $listHelper, $data);
        $this->dataProvider = $dataProvider;
    }

    public function _construct()
    {
        if (!$this->hasData('template')) {
            $this->setData('template', 'Swissup_Testimonials::widgets/slider.phtml');
        }

        parent::_construct();
    }

    /**
     * @return \Swissup\Testimonials\Model\ResourceModel\Data\Collection
     */
    public function getTestimonials()
    {
        if (!$this->hasData('testimonials')) {
            $storeId = $this->_storeManager->getStore()->getId();

            $dataProvider = $this->dataProvider
                ->addStatusFilter(TestimonialsModel::STATUS_ENABLED)
                ->addWidgetFilter(true)
                ->addStoreFilter([\Magento\Store\Model\Store::DEFAULT_STORE_ID, $storeId])
                ->setRandomOrder(false)
                ->setCurPage(1)
                ->setPageSize($this->getItemsNumber())
            ;
            $collection = $dataProvider->getCollection();

            $this->setData('testimonials', $collection);
        }

        return $this->getData('testimonials');
    }
}
