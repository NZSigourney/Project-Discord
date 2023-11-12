<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/speech/v1/resource.proto

namespace GPBMetadata\Google\Cloud\Speech\V1;

class Resource
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Resource::initOnce();
        $pool->internalAddGeneratedFile(
            '
�	
%google/cloud/speech/v1/resource.protogoogle.cloud.speech.v1"�
CustomClass
name (	
custom_class_id (	<
items (2-.google.cloud.speech.v1.CustomClass.ClassItem
	ClassItem
value (	:l�Ai
!speech.googleapis.com/CustomClassDprojects/{project}/locations/{location}/customClasses/{custom_class}"�
	PhraseSet
name (	9
phrases (2(.google.cloud.speech.v1.PhraseSet.Phrase
boost (&
Phrase
value (	
boost (:e�Ab
speech.googleapis.com/PhraseSet?projects/{project}/locations/{location}/phraseSets/{phrase_set}"�
SpeechAdaptation6
phrase_sets (2!.google.cloud.speech.v1.PhraseSetC
phrase_set_references (	B$�A!
speech.googleapis.com/PhraseSet;
custom_classes (2#.google.cloud.speech.v1.CustomClassJ
abnf_grammar (24.google.cloud.speech.v1.SpeechAdaptation.ABNFGrammar#
ABNFGrammar
abnf_strings (	"�
TranscriptNormalizationF
entries (25.google.cloud.speech.v1.TranscriptNormalization.Entry@
Entry
search (	
replace (	
case_sensitive (Bp
com.google.cloud.speech.v1BSpeechResourceProtoPZ2cloud.google.com/go/speech/apiv1/speechpb;speechpb��GCSbproto3'
        , true);

        static::$is_initialized = true;
    }
}

