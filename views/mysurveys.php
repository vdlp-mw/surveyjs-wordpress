<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class WP_SJS_MySurveys {

    function __construct() {
    }

    public static function render() {
        $client = new WP_Service_Client();
        ?>
            <div class="wrap">
                <h2><?php _e( 'Available surveys list', 'sjs' ); ?></h2>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($client->getSurveys() as $surveyDefinition) {
                            $url = add_query_arg(array('page' => 'wp_surveyjs_editor', 'id' => $surveyDefinition->Id), admin_url('admin.php'));
                        ?>
                        <tr>
                            <td><?php echo $surveyDefinition->Name ?></td>
                            <td>
                                <!-- <a href="<?php echo $surveyDefinition->Id ?>">Run</a> | -->
                                <a href="<?php echo $url ?>">Edit</a> |
                                <a href="<?php echo $surveyDefinition->Id ?>">Results</a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php
    }
}

?>