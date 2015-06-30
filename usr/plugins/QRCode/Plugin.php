<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 为每篇文章显示一个二维码，可以直接用手机扫描，方便手机查看
 * 
 * @package QRCode
 * @author aneasystone
 * @version 1.0.0
 * @link http://www.aneasystone.com
 */
class QRCode_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('QRCode_Plugin', 'render');
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 插件实现方法
     * 
     * @access public
     * @return void
     */
    public static function render($text, $widget)
    {
    	$content = $text;
    	$currentPath = Helper::options()->pluginUrl . '/QRCode/';
    	$content .= '<script type="text/javascript" src="' . $currentPath . 'assets/jquery.min.js"></script>' . "\n";
    	$content .= '<script type="text/javascript" src="' . $currentPath . 'assets/jquery.qrcode.min.js"></script>' . "\n";
        $content .= '<script type="text/javascript" src="' . $currentPath . 'assets/plugin.js"></script>' . "\n";
        
        $content .= '<div class="qrcode" style="display: none;"></div>';
		return $content;
    }
}
