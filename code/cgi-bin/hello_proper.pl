#!/usr/bin/perl -wT
use strict;
use CGI qw(header);
use CGI::Carp qw(fatalsToBrowser);

my $query = CGI::->new();

print 	$query->header("text/html"),
		$query->start_html(	-title		=> "My first Perl Script",
							-bgcolor	=> "#000",
							-text		=> "f0f",
							),
		$query->h1("Hello, world!\n"),
		$query->p("This is an extremely basic Perl script\n"),
		$query->end_html;