<?

$arEventFields = array(
    'RANDOM_STR' => md5(time()),
    'TIME_RUN' => date('H:i:s d-m-Y'),
);

CEvent::Send("MAKE_ORDER_PAGE_EVENT", 's1', $arEventFields);

?>