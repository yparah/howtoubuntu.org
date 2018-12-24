<?php

	$Title_HTML = 'How to Set-up Rebootless Kernel Security Updates on Ubuntu 18.04 LTS';
	$Title_Plain = $Title_HTML;

	$Description_HTML = 'This article covers installation of two rebootless kernel security patching solutions for Desktop and Server flavors of Ubuntu 16.04 LTS and 18.04 LTS.';
	$Description_Plain = $Description_HTML;

	$Keywords = 'kernel live update patching liveupdate kernelcare';

	$Featured_Image = '';

	$Canonical = 'how-to-set-up-automated-rebootless-kernel-updates-in-ubuntu';

	$Post_Type = 'Blog Post';
	$Post_Category = '';

	require_once __DIR__.'/../request.php';

if ($Request['path'] === $Place['path'].$Canonical) {

	require '../header.php';
	?>

	<ul>
    <li>Introduction</li>
  </ul>
  <ul>
    <li>On Linux, everything can be updated without rebooting except for the kernel.</li>
    <li>Rebootless updating (aka live patching) is one solution.</li>
    <li>Since Ubuntu 18.04, this technique got more focus.</li>
  </ul>
  <ul>
    <li>A list of reasons for not wanting to reboot</li>
    <li>What is rebootless kernel updating/patching?</li>
  </ul>
  <ul>
    <li>Basic description of what it is and how it works.</li>
    <li>Ubuntu only has two commercially-supported solutions: Canonical Livepatch and KernelCare.</li>
  </ul>
  <ul>
    <li>Steps for installing Canonical Livepatch Service on Ubuntu 18.04 (with notes on 16.04)</li>
    <li>Steps for installing on KernelCare on Ubuntu 18.04</li>
    <li>Two-point conclusion</li>
  </ul>
  <hr>
  <p>Rebootless Kernel Security Updates on Ubuntu 18.04 LTS</p>
  <h1>Introduction</h1>
  <ul>
    <li>Everything on Linux can be updated without rebooting, except for the kernel.</li>
    <li>When it needs updating, it is usually because of an urgent and important security patch. Installing it means rebooting. Deferring it runs the risk of being hacked.</li>
    <li>(Note: This is not about never rebooting, or trying to get multi-year uptimes, it’s just about being safe and rebooting when it’s convenient for you and your users.)</li>
    <li>This article covers installation of two rebootless kernel security patching solutions for Desktop and Server flavors of Ubuntu 16.04 LTS and 18.04 LTS.</li>
  </ul>
  <h1>Why would you not&nbsp;want to reboot?</h1>
  <ul>
    <li>There are many reasons not to reboot a Linux server. You may be running:</li>
  </ul>
  <ul>
    <li>Busy active web users in all time-zones;</li>
    <li>Running a multi-player game server (e.g. Minecraft, Steam) or video streaming service;</li>
    <li>Physical premises 24/7 live-recording systems;</li>
    <li>Running a cryptocurrency exchange or mining operation;</li>
    <li>Long-running scientific or mathematics simulations;</li>
    <li>Or, you’re afraid it won’t come up again properly.</li>
  </ul>
  <h1>What is ‘Rebootless Kernel Patching’?</h1>
  <ul>
    <li>Automation (via scripting) is second-nature to Linux sys admins.</li>
    <li>But the ability to automate kernel security updates is rarely discussed or implemented. It’s called ‘rebootless kernel patching’.</li>
    <li>It is a well-established technique with growing support among vendors. Native kernel abilities since 4.0.</li>
    <li>Implemented as a kernel module. It analyzes the stack, freezes processing, remaps function pointers to new implementations, then restores processing.</li>
    <li>It all happens in microseconds.</li>
    <li>Someone else looks after the distribution and notification of patches.</li>
    <li>There are only two solutions for Ubuntu:</li>
  </ul>
  <ul>
    <li>Canonical Livepatch Service</li>
    <li>KernelCare</li>
  </ul>
  <ul>
    <li>Here’s how they each work.</li>
  </ul>
  <h1>Canonical Livepatch Service</h1>
  <ul>
    <li>Kernel updates via ‘Canonical Livepatch Service’: Free for individuals with up to three machines. Requires registration.</li>
    <li>Since desktop Ubuntu 18.04 LTS, Livepatch is selectable from the GUI, during post-install set-up or later.</li>
    <li>Livepatch also works on 14.04 LTS and 16.04 LTS but must be set up manually.</li>
    <li>A single user can install Livepatch on 3 servers. (More than that is expensive.)</li>
    <li>Before you start</li>
  </ul>
  <ul>
    <li>Make sure your system is fully up to date.</li>
    <li>Make sure you have a complete and freshly made backup.</li>
    <li>In all cases, registration is required but you can use an existing ‘Ubuntu One’ account.</li>
  </ul>
  <ul>
    <li>Except for 18.04 LTS Desktop, get a key (and make a note of it) from <a href="https://auth.livepatch.canonical.com/">here</a>, logging in with either a Livepatch or Ubuntu One account.
    </li>
  </ul>
  <h2>Installing</h2>
  <h3>18.04 LTS Desktop</h3>
  <ul>
    <li>If you are ‘consolephobic’, this version of Ubuntu adds a GUI control for activating Livepatch. You can do it either during the post-install setup, or afterwards.</li>
    <li>During Post-Install Setup</li>
  </ul>
  <ol>
    <li>After rebooting for the first time following a fresh install, the second screen of the ‘What’s new in Ubuntu’ dialogue gives the option to use Livepatch.</li>
    <li>Click ‘Set Up Livepatch…’</li>
    <li>At the ‘Ubuntu Single Sign-On Account’ log in with any Ubuntu account (e.g. <a href="https://login.ubuntu.com">Ubuntu One</a>).
    </li>
  </ol>
  <ul>
    <li>If installing the via the text-based GUI (as used by the Server version), under ‘Featured Server Snaps’ choose ‘canonical-livepatch’</li>
    <li>On an existing Installation</li>
  </ul>
  <ol>
    <li>Open software updater</li>
    <li>Click ‘Settings’</li>
    <li>In the ‘Updates’ tab, sign into the Livepatch. Tick/confirm ticked ‘User Canonical Livepatch to increase security between restarts’</li>
  </ol>
  <h3>16.04 LTS & 18.04 LTS (Terminal)</h3>
  <ul>
    <li>These methods work for both desktop and server versions of 16.04 and 18.04.</li>
    <li>In a terminal, use commands:</li>
  </ul>
  <p><code>sudo snap install canonical-livepatch<br>
  sudo canonical-livepatch enable &lt;key&gt;</code></p>
  <p>Note: These commands are also shown in easily cut-and-pastable form when registering for a key.</p>
  <h2>Tips</h2>
  <ul>
    <li>The last command returns a machine-token but it serves no purpose.</li>
    <li>Keep track of machines registered. The limit is 3. To deregister:</li>
  </ul>
  <p><code>sudo canonical-livepatch disable &lt;key&gt;</code></p>
  <ul>
    <li>To check the status of the service:</li>
  </ul>
  <p><code>canonical-livepatch status --verbose</code></p>
  <ul>
    <li>Important:&nbsp;Don’t forget to deregister if only testing as it is impossible to do so without access to the machine itself. (There is a workaround <a href="https://askubuntu.com/questions/1032700/how-to-disable-livepatch-tokens-remotely">here</a>)
    </li>
  </ul>
  <h2>KernelCare</h2>
  <ul>
    <li>KernelCare <a href="https://www.kernelcare.com/supported-distributions-and-kernels/">covers</a> more OSs, including CentOS, RHEL, Oracle Linux, Debian, Ubuntu and others. It also supports Ubuntu 16.04 & 14.04, and older 2.6.32 kernels.</li>
    <li>It’s not free (unless you are a non-profit organization), but there is a free, 30-day trial.</li>
    <li>Cost-effective if used for shared hosting web servers, as charged per server, not per host.</li>
    <li>Fully automatic (‘install and forget’ type) solution.</li>
  </ul>
  <ul>
    <li>Automatic check every 4 hours.</li>
    <li>Automatic install if any available.</li>
  </ul>
  <ul>
    <li>More tweaking options: delayed patches, fixed patches.</li>
    <li>Handled recent issues:</li>
  </ul>
  <ul>
    <li>Meltdown (CVE–2017–5754)</li>
    <li>Spectre (CVE–2017–5753 & CVE–2017–5715)</li>
    <li>Mutagen Astronomy (CVE–2018–14634)</li>
  </ul>
  <ul>
    <li>Before you start</li>
  </ul>
  <ul>
    <li>Get a trial key from <a href="https://cloudlinux.com/kernelcare-free-trial5">here</a>.</li>
  </ul>
  <h3>Installation</h3>
  <ul>
    <li>Once you have a key, installation is done in a terminal with two commands.</li>
  </ul>
  <p><code>sudo wget -qq -O - https://repo.cloudlinux.com/kernelcare/kernelcare_install.sh | bash<br>
  sudo /usr/bin/kcarectl --register KEY</code></p>
  <h1>Conclusion</h1>
  <ul>
    <li>Ubuntu’s latest release makes it easier to use rebootless linux kernel security patching. But only for Ubuntu. Free for 3 hosts but prices escalate to excruciating levels for 4 or more.</li>
    <li>If you move platforms a lot, and want a fully automated solution, consider KernelCare. Not free but a free 30-day trial and prices increment linearly with number of servers.</li>
  </ul>

	<?php
	require '../footer.php';
}
