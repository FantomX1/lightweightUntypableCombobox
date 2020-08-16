<?php


namespace fantomx1\lightweightUntypableCombobox;


use fantomx1\ViewLocatorRenderTrait;

/**
 * Class lightWeightUntypable
 * @package fantomx1\datatables\customWidgets\selectFilterWidget
 */
class lightweightUntypableCombobox
{
    use ViewLocatorRenderTrait;

    private $customHtml;

    // @TODO: add element and execept element of certain agreed , or rather by ourself provided interface, or just parametrizing a button
    public function appendCustomHtml($customHtml)
    {

        $this->customHtml = $customHtml;
        return $this;
    }


    /**
     * @param $name
     */
    public function run(
        $groupId,
        $data,
        $name = "filter"
    )
    {

        // passing entire object to tempalte is not pure, mixed within html as mixed within code not as params
        // unless are static helpers
        // it needs also unique name for grouping, however same variable for same vaariabel proessing by same sytle

        $this->render(
            "index",
            [
                'customHtml' => $this->customHtml,
                'groupId'    => $groupId,
                'data'       => $data,
                'name'       => $name,
            ]
        );
    }

    /**
     * protected function getViewsDir()
     * {
     * return $this->getDefaultViewsDir();
     * }
     * @return string
     */
    protected function getViewsDir()
    {
        return $this->getDefaultViewsDir("./template");
    }
}
