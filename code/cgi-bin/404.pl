#!/usr/bin/perl -w
use strict;
use CGI qw(header);

print header();

my $sigfile = '/Library/WebServer/CGI-Executables/yo_momma.txt';
my $q       = '';
$/          = '%%';
$ARGV[0]    = $sigfile;

srand( time ^ ($$ + ($$ << 15)) );
rand($.) < 1 && ($q=$_) while<>;

chomp($q);
print $q;

1;