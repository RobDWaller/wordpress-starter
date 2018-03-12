<?php
function get_git_version()
{
    $getGitVersion = getenv("WP_GET_GIT_VERSION");
    if ($getGitVersion == null ||strtolower($getGitVersion) === 'true') {
        echo '<span style="display:block; width:30%; margin:auto; text-align:center; font-size:10px;">';

        $commitHash = trim(exec('git log --pretty="%h" -n1 HEAD'));
        $tag = trim(exec('git describe --exact-match --tags $(git log -n1 --pretty=\'%h\')'));

        $commitDate = new \DateTime(trim(exec('git log -n1 --pretty=%ci HEAD')));
        $commitDate->setTimezone(new \DateTimeZone('UTC'));

        echo sprintf('%s %s (%s)', $tag, $commitHash, $commitDate->format('Y-m-d H:m:s'));
        echo '</span>';
    }
}
add_action('wp_footer', 'get_git_version');
