<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Question
 *
 * @mixin \Eloquent
 */
class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'form_id', 'type', 'attr', 'sequence', 'updated_by'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function form()
    {
        return $this->belongsTo('Form');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function answer()
    {
        return $this->belongsToMany('App\Answer');
    }

    /**
     * @return array
     */
    public static function schema()
    {
        return [
            'form_id' => 0,
            'type' => 'context, text, tick, or radio',
            'attr' => 'JSON encoded question content - GET questions/schema for detailed options',
            'sequence' => 'integer question order, null if shuffled',
            'updated_by' => 'user id'
        ];
    }

    public static function contentSchema()
    {
        return [
            'MCQ - 1 answer' => [
                'type' => 'radio',
                'attr' => [
                    'prompt' => 'who was first president?',
                    'weight' => 1,
                    'shuffle' => true,
                    'opt' => [
                        'tony tuna' => 0,
                        'ronald mcdonald' => 0,
                        'leslie knope' => 0,
                        'george washington' => 1
                    ]
                ]
            ],
            'MCQ - pathing' => [
                'type' => 'radio',
                'attr' => [
                    'path' => [
                        'type' => 'key',
                        'case' => 'tony tuna'
                    ],
                    'prompt' => 'why did you choose tony tuna?',
                    'weight' => 0,
                    'shuffle' => true,
                    'opt' => [
                        'I dunno' => 0,
                        'just dumb i guess' => 0,
                        'i love tuna' => 0
                    ]
                ]
            ],
            'MCQ - multiple answer' => [
                [
                    'type' => 'tick',
                    'attr' => [
                        'prompt' => 'days of week?',
                        'weight' => 1,
                        'shuffle' => true,
                        'scoring' => 'all',
                        'opt' => [
                            'monday' => 1,
                            'funday' => 0,
                            'cervesa' => 0,
                            'saturday' => 1
                        ]
                    ]
                ]
            ],
            'section name or direction' => [
                'type' => 'context',
                'attr' => [
                    'text' => 'e.g.: the following questions relate to week 3 section 0'
                ]
            ],
            'text box' => [
                'type' => 'text',
                'attr' => [
                    'prompt' => 'final comments:',
                    'weight' => 0
                ]
            ],
            'survey' => [
                'type' => 'radio',
                'attr' => [
                    'prompt' => 'whats your favorite color?',
                    'weight' => 0,
                    'shuffle' => false,
                    'opt' => [
                        'charcoal' => 0,
                        'cyan' => 0,
                        'chartreuse' => 0,
                        'coral' => 0
                    ]
                ]
            ]
        ];
    }
}
