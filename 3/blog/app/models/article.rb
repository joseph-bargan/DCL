class Article < ApplicationRecord
  validates :title, presence: true,
                    length: { minimum: 5 }
   has_many :images # association with image model
   accepts_nested_attributes_for :images, reject_if: :all_blank, allow_destroy: true
end