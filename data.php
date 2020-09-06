class RestroData {
    
    private $menulist;

    function __construct(array $menulist) {
        if (sizeof($menulist)>0) {
            $this->menulist = $menulist;
        } else {
            throw new Exception("No record available");
        }
    }

    public function getmenuItemName() {
        $menuItemNameList = [];

        foreach($this->menulist as $menu) {
            $menuItemNameList[] = array(
                 
                "name"=>$menu['name']  
            );
        }

        return json_encode($menuItemNameList);
    }

    public function getmenuDetails($name) {
        $response = ["Invalid Option"];
        if($name) {
            foreach($this->menulist as $menu) {
                if ($name == $menu['name']) {
                    $response = $menu;
                    break;
                }
            }
        }
        return json_encode($response);
    }
}
?>