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

    /**
     * @param $name
     */
    public function run($groupId, $data, $name = "filter")
    {

        $this->render(
            "index",
            [
                'groupId' => $groupId,
                'data' => $data,
                'name' => $name,
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
