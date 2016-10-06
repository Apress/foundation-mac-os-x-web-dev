#!/usr/bin/perl -w
use strict;
use CGI qw(header);
print header("text/plain") . "\n"; # prints the HTTP header
                                   # telling the client that
                                   # some plain text follows
                                   # and appends a newline
                                   # to tell the client that
                                   # the header has ended and
                                   # page content follows

# location of sigfile
my $sigfile = '/Library/WebServer/CGI-Executables/random.txt';

open(FILE, $sigfile); # open filehandle to sigfile and call it FILE

$/ = "%%";	# set field-seperator variable to '%%';
my $q = ''; # create and initialise var for holding line

# iterate over the cookie file and choose a line at random
while(<FILE>){
  $q = $_ if(rand($.) < 1);
}

chomp($q);
print $q;	# print our random line