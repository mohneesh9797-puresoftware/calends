.. _installation-cli:

.. index::
   pair: installation; CLI

Installing Calends for the Command Line
=======================================

You can grab a ``calends`` binary for your platform OS/architecture from the
`GitHub Releases page <https://github.com/danhunsaker/calends/releases>`_, and
just run it directly. Alternately, you can clone the source and build it from
there:

.. code-block:: bash

   # Sample Linux steps:
   mkdir -p $GOPATH/src/github.com/danhunsaker
   cd $GOPATH/src/github.com/danhunsaker
   git clone https://github.com/danhunsaker/calends
   cd calends
   go get ./...
   go build -o calends ./cli
